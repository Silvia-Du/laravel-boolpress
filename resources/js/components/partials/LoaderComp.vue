<template>
  <div class="loader d-flex justify-content-center align-items-center">
    <div class="little-loader"></div>
  </div>
</template>

<script>
export default {
    name: 'LoaderComp'
}
</script>

<style lang="scss" scoped >

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 40%;
  border-top: 16px solid rgb(132, 0, 255);
  border-bottom: 16px solid  rgb(132, 0, 255);
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); background-color: blue; border-top: 16px solid blue}
  50%{ background-color: rgb(255, 0, 242)}
  100% { -webkit-transform: rotate(360deg); background-color: orange; border-bottom: 16px solid  orange}
}
.little-loader {
  border: 16px solid #f3f3f3;
  border-radius: 40%;
  width: 60px;
  height: 60px;
  -webkit-animation: little-spin 1s linear infinite;
  animation: little-spin 1s linear infinite;
}

@-webkit-keyframes little-spin {
  0% { -webkit-transform: rotate(0deg); background-color: blue; border-top: 16px solid blue}
  50%{ background-color: rgb(255, 0, 242);}
  100% { -webkit-transform: rotate(360deg); background-color: orange; border-bottom: 16px solid  orange}
}


</style>
