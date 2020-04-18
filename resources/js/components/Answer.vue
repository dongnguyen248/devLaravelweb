<script>
export default {
  props: ["answer"],
  data() {
    return {
      body: this.answer.body,
      editing: false,
      bodyHtml: this.answer.body_html,
      id: this.answer.id,
      questionId: this.answer.question_id,
      beforEditCache: null
    };
  },
  methods: {
    edit() {
      this.editing = true;
      this.beforEditCache = this.body;
    },
    cancel() {
      this.body = this.beforEditCache;
      this.editing = false;
    },
    update() {
      axios
        .patch(this.endpoint, {
          body: this.body
        })
        .then(res => {
          console.log(res);
          this.editing = false;
          this.bodyHtml = res.data.body_html;
          this.$toast.success(res.data.message, "Success", { timeout: 3000 });
        })
        .catch(err => {
          this.$toast.error(err.response.data.message, "Error", {
            timeout: 3000
          });
        });
    },
    destroy() {
      this.$toast.question("Are you sure about that?", "Confirm", {
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: "once",
        id: "question",
        zindex: 999,
        title: "Hey",
        position: "center",
        buttons: [
          [
            "<button><b>YES</b></button>",
            (instance, toast) => {
              //need to change it to arrow function because we need to use external methods.
              axios.delete(this.endpoint).then(res => {
                console.log(res);
                $(this.$el).fadeOut(500, () => {
                  //$el = element : https://vuejs.org/v2/api/#vm-el
                  this.$toast.success(res.data.message, "Success", {
                    timeout: 3000
                  });
                });
              });
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            },
            true
          ],
          [
            "<button>NO</button>",
            function(instance, toast) {
              instance.hide({ transitionOut: "fadeOut" }, toast, "button");
            }
          ]
        ]
      });
    }
  },
  computed: {
    isActice() {
      return this.body.length < 10; //if this.body.length > 10 return true else false
    },
    endpoint() {
      return `${this.questionId}/answers/${this.id}`;
    }
  }
};
</script>