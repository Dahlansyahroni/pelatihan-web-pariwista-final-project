import axios from "axios";

window.axios = axios;
window.axios.default.headers.common['X-Requested-with'] = 'X-Request';