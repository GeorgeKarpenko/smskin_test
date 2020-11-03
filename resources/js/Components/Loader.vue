<template>
    <div class="spinner">
        <b-spinner label="Spinning"></b-spinner>
    </div>
</template>

<script>
export default {
  computed: {
    color() {
      const colors = ['spinner-red-only', 'spinner-blue-only', 'spinner-green-only']
      return colors[Math.floor(Math.random() * 3)]
    }
  }
}
</script>

<style scoped>
.spinner{
    height: 50vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>