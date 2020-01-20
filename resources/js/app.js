import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import axios from 'axios'
import $ from 'jquery'
import moment from 'moment'

import '~/plugins'
import '~/components'

window.axios = axios
window.$ = $
window.moment = moment

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
