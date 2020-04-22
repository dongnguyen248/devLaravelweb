<template>
  <div>
    <a
      title="Click to add mark favorite question (Click again undo)"
      :class="classes"
      @click.prevent="toggle"
    >
      <i class="fas fa-star fa-2x"></i>
      <span class="favorite-count">{{count}}</span>
    </a>
  </div>
</template>
<script>
export default {
  props: ["question"],
  data() {
    return {
      isFavorite: this.question.is_favorited,
      count: this.question.favorites_count,
      id: this.question.id,
      user_id: this.question.user_id
    };
  },
  computed: {
    classes() {
      return [
        "favorite",
        "mt-2",
       !this.signIn ? 'off' : (this.isFavorite ? 'favorited' : '')
      ];
    },
    endpoit() {
      return `${this.id}/favorites`;
    },
    signIn() {
      return window.Auth.signIn;
    },
  },
  methods: {
    
    toggle() {
      if (!this.signIn) {
        this.$toast.warning(
          "Please sign in to add favorite question",
          "Warning",
          {
            timeout: 3000,
            position: "topLeft"
          }
        );
        return;
      }
      this.isFavorite ? this.destroy() : this.create();
    },
    destroy() {
      axios.delete(this.endpoit).then(res => {
        this.count--;
        this.isFavorite = false;
        this.$toast.warning(res.data.message, "UnFavorite", {
          timeout: 3000
        });
      });
    },
    create() {
      axios.post(this.endpoit).then(res => {
        this.count++;
        this.isFavorite = true;
        this.$toast.success(res.data.message, "AddFavorite", {
          timeout: 3000
        });
      });
    }
  }
};
</script>