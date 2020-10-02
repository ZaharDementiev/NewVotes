<template>
  <div class="wrap-reviews">
    <div v-for="(feedback, index) in userFeedbacks" :class="positiveClass(feedback)">
        <div class="reviews-el__top">
          <div class="reviews-el__rating rating">
            <div v-for="index in 5" :class="ratingClass(index, feedback)"></div>
          </div>
          <div class="reviews-el__time">{{ $moment(feedback.created_at).tz('Europe/Moscow').fromNow() }} </div>
        </div>
        <div class="reviews-el__body">
          <p class="reviews-el__text">{{ feedback.text }}</p>
        </div>
      </div>
    <div class="btn-green tapes-else" @click="load()">
      <a>Смотреть еще <img src="/img/tape/else_icon.svg" alt=""></a>
    </div>
  </div>
</template>

<script>
export default {
  name: "feedbacks",
  props: ['list', 'user_id'],
  data() {
    return {
      userFeedbacks: [],
    }
  },
  beforeMount() {
    this.userFeedbacks = this.list;
    console.log(this.list);
  },
  methods: {
    positiveClass(feedback) {
      if(feedback.positive) {
        return 'wrap-reviews__el reviews-el';
      } else {
        return 'wrap-reviews__el reviews-el reviews-el_bad';
      }
    },
    ratingClass(index, feedback) {
      if (feedback.points >= index) {
        return 'rating__el rating-el rating-el_active';
      } else {
        return 'rating__el rating-el';
      }
    },
    load() {
      let ids = this.userFeedbacks.map(feedback => feedback.id);
      axios.post('/feedback/load/' + this.user_id, {ids:ids}).then(resp => {
        this.userFeedbacks = this.userFeedbacks.concat(resp.data);
        console.log(resp);
      })
    }
  }
}
</script>

<style scoped>

</style>