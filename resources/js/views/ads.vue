<template dir="rtl">
    <div class="container" >


<!-- Modal -->





             <form action="" method="post" dir="rtl">

                <!-- {{ csrf_field() }} -->
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" class="form-control my-2" id="title" name="title" v-model="Ad.title">
                </div>
                <div class="form-group">
                    <label for="content">المحتوى</label>
                    <textarea class="form-control my-2" id="content" name="content"  v-model="Ad.content" ></textarea>
                </div>

                <div class="form-group">
                    <label for="pic">الصورة</label>
                    <input type="file" class="form-control my-2" id="pic" name="pic">
                </div>
                <div class="form-group">
                    <label for="contentonly">اظهار المحتوى فقط</label>
                    <input type="checkbox" class="form-control" id="contentonly" name="contentonly"  value="1">
                </div>
                <div class="form-group">
                    <label for="piconly">اظهار الصورة فقط</label>
                    <input type="checkbox" class="form-control" id="piconly" name="piconly"  value="1">
                </div>
<button type="button" class="btn btn-success">حفظ</button>
            </form>





    </div>

</template>

<script>
export default {
  computed: {},
  data() {
      return {
          Ad:{
              id:'',
              title:'',
              content:''
          }
      }
  }
};
</script>
