document.addEventListener("DOMContentLoaded", function(event) {
  var courseSelect= document.getElementById("course_id");
  if (courseSelect) {
    courseSelect.onchange=getClassesByCourse;
  }

});


function getClassesByCourse(event) {
  var course_id=(event.target.value);
  var classSelect = document.getElementById("class_id");
  var optionWait = document.createElement("option");
  classSelect.options.length = 0;
  optionWait.text = 'Please Wait....';
  classSelect.add(optionWait);
  if(course_id){
    axios.get('/course/' + course_id+'/classes')
    .then(function(response) {
      var list = response.data;
      optionWait.text = 'Please select a class';
      for (var key in list) {
        var startDate = new Date(list[key].startDate);
        var endDate = new Date(list[key].endDate);
        var option = document.createElement("option");
        option.value=list[key].id;
        option.text = '(#'+list[key].id+') '+startDate.toLocaleDateString()+' - '+endDate.toLocaleDateString();
        classSelect.add(option);
      }
    })
    .catch(function(error) {
      console.log(error);
    });
  }
}
