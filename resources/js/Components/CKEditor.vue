<template>
    <div id="app">
      <ckeditor :editor="editor" v-model="content" @input="updateContent"></ckeditor>
    </div>
  </template>
  <script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import CKEditor from "@ckeditor/ckeditor5-vue"
  
    export default {
      name: 'app',
      props: ['edited'],
      components: {
        ckeditor: CKEditor.component
      },
      mounted(){
        if(this.edited){
          this.content = this.edited
        }
      },
      data() {
        return {
          editor: ClassicEditor,
          content: ""
        };
      },
      methods : {
        updateContent(){
            this.$emit('change', this.content)
        },
      }
    }
  </script>
  