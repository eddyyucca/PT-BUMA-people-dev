document.querySelector(".first").addEventListener('click', function(){
2
  swal("Our First Alert");
3
});
4
5
document.querySelector(".second").addEventListener('click', function(){
6
  swal("Our First Alert", "With some body text!");
7
});
8
9
document.querySelector(".third").addEventListener('click', function(){
10
  swal("Our First Alert", "With some body text and success icon!", "success");
11
});