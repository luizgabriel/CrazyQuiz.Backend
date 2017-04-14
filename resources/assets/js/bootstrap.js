window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');


window.axios = require('axios');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = $('[name="csrf_token"]').attr('content');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('icheck/icheck');

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
