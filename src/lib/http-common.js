import axios from "axios";

var instance = axios.create({
  baseURL: "http://localhost/crud-agile-server",
  timeout: 6000
});

class http {
  static async get(url, params) {
    return await instance.get(url, { params });
  }

  static async post(url, params) {
    return await instance.post(url, JSON.stringify(params));
  }
}

export default http;
