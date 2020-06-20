function display_alert(){
  alert("Alert!")
}


function showImg(){
  var file =  document.getElementById('img_file').files[0];
  var fileName = document.getElementById("img_file").value;
  var re = new FileReader();
  re.readAsDataURL(file);
  re.onload = function(re){
    $('#img_id').attr("src", re.target.result);
    $('#img_url').attr("value", fileName.substring(fileName.lastIndexOf("\\")+1));
  }
}

cities = new Object();
cities['CA'] = new Array('Ottawa','Halifax','Toronto','Kingston');
cities['GR'] = new Array('Athens', 'Exarhia', 'Kypseli');
cities['IT'] = new Array('Roma','Milan','Venice','Florence');
cities['US'] = new Array('New York','San Francisco', 'Washington');
function set_city(country, city)
{
  var pv, cv;
  var i, ii;
  pv = country.value;
  cv = city.value;
  city.length = 1;
  if(pv == '0') return;
  if(typeof(cities[pv]) == 'undefined') return;
  for(i = 0; i < cities[pv].length; i++)
  {
    ii = i + 1;
    city.options[ii] = new Option();
    city.options[ii].text = cities[pv][i];
    city.options[ii].value = cities[pv][i];
  }
}