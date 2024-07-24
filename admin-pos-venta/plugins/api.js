export default function ({ $axios }, inject) {
  // Create a custom axios instance
  const api = $axios.create({
    headers: {
      common: {
        Accept: 'text/plain, */*'
      }
    }
  })
let url ='http://127.0.0.1:8000/api/'
  api.url = url
  api.setBaseURL(url)

<<<<<<< HEAD
  // Inject to context as $api
  inject('api', api)
=======
    // Set baseURL to something different
    api.setBaseURL('http://localhost:8000/api/')

    // Inject to context as $api
    inject('api', api)
>>>>>>> 41eb5a0ed8c900589e993719c06cf17f54cbdfaf
}
