import './bootstrap';
import '../css/app.css';

import { createApp } from 'vue';
import Welcome from './Welcome.vue';

/* `createApp(Welcome)` creates a new Vue application instance with the `Welcome` component as the root
component. `.mount('#app')` mounts the Vue application instance to the DOM element with the ID
`app`. This means that the `Welcome` component will be rendered inside the HTML element with the ID
`app`. */
createApp(Welcome).mount('#app');