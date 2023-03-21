export default {
 search_term:'',
 results:null,
 index:null,
 search_options:{limit:10},
 watchSearchTerm(){
   this.$watch('search_term',(search_term)=>{
     this.search(search_term);
   });
 },

 async search(search_term){
  this.results =  search_term !==''? await this.index.search(search_term,{
     limit:2,
     attributesToHighlight: ['title']
    }) : null;
 },
 start(){  
    const client = new window.MeiliSearch({
     host:'http://localhost:7700'
    });
    
    this.index = client.index('articles');
    this.watchSearchTerm();
 }




}