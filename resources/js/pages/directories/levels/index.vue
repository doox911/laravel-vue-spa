<template>
  <div class="row">
    <h1>
      {{ $t('levels_directory') }}
      <button
        type="button"
        class="btn btn-success"
        data-toggle="modal"
        data-target="#add_level"
        @click="store = true"
      >
        {{ $t('add') }}
      </button>
    </h1>
    <table class="table table-hover">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{ $t('name') }}</th>
        <th scope="col">{{ $t('type') }}</th>
        <th scope="col">{{ $t('updated_at') }}</th>
        <th scope="col">{{ $t('created_at') }}</th>
        <th scope="col">{{ $t('edit') }}</th>
        <th scope="col">{{ $t('remove') }}</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="level in levels">
        <th scope="row">{{ level.id }}</th>
        <td>{{ level.name }}</td>
        <td>{{ getTypeName(level.level_type) }}</td>
        <td>{{ getCurrentDate(level.updated_at) }}</td>
        <td>{{ getCurrentDate(level.created_at) }}</td>
        <td></td>
        <td></td>
      </tr>
      </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="add_level" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">{{ $t('add') + ' ' + $t('level')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="name_select">{{ $t('name') }}</label>
                <input v-model="selected_name" type="text" class="form-control" id="name_select">
              </div>
              <div class="form-group">
                <label for="type_select">{{ $t('type') }}</label>
                <select
                  class="form-control" id="type_select"
                  v-model="selected_type"
                >
                  <option v-for="type in level_types" :value="type.value">{{ type.description }}</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $t('close') }}</button>
            <button type="button" class="btn btn-primary"  data-dismiss="modal" @click="save">{{ $t('save') }}</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>


export default {
  name: 'Levels',
  middleware: 'auth',
  data () {
    return {
      levels: [],
      level_types: [],
      selected_name: '',
      selected_type: '',
      store: false
    }
  },
  mounted () {
    window.moment.locale('ru');
    this.initLevels();
    this.initLevelTypes();
  },
  methods: {
    getLevels () {
      return window.axios.get('/api/levels')
    },
    getLevelTypes () {
      return window.axios.get('/api/get_level_types')
    },
    getTypeName (type) {
      const el = this.level_types.find(lt => lt.value === type);
      return el ? el.description : '-';
    },
    getCurrentDate (date) {
      return window.moment(date).calendar()
    },
    initLevels () {
      this.getLevels().then(response => {
        this.levels = response.data
      }).catch(error => {
        console.log(error.data)
      }).finally(() => {

      })
    },
    initLevelTypes () {
      this.getLevelTypes().then(response => {
        this.level_types = response.data
      }).catch(error => {
        console.log(error.data)
      }).finally(() => {

      })
    },
    save () {
      if (this.store) this.create()
      else this.update()
      this.store = false
    },
    create () {
      window.axios.post('/api/levels', {
        name: this.selected_name,
        type: this.selected_type
      }).then(response => {
        console.log(response.data);
        this.levels.push(response.data);
      }).catch(error => {
        console.log(error.data)
      }).finally(() => {

      })
    },
    update () {

    }
  }
}
</script>

<style scoped>

</style>
