<template>
  <div class="row">
    <h1>{{ $t('levels_directory') }}</h1>
  </div>
</template>

<script>
export default {
  name: 'Levels',
  middleware: 'auth'
}
</script>

<style scoped>

</style>
