export default function ({ $axios }, inject) {
  // Create a custom axios instance
  const api = $axios.create({
    headers: {
      common: {
        Accept: 'text/plain, */*'
      }
    }
  })
  // api.setBaseURL('http://laravel/api/')
let url ='http://127.0.0.1:8000/api/'
  api.url = url
  api.setBaseURL(url)

    // Set baseURL to something different

    // Inject to context as $api
    inject('api', api)
}

