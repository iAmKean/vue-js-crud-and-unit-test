module.exports = {
  devServer: {
    proxy: {
      "/": {
        target: "http://localhost/crud-agile-server",
        secure: true,
        changeOrigin: true
      }
    }
  },
}