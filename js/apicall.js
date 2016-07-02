$(document).ready(function(e){
	
var params = {'request':'getContacts'};
makeRequest(params);

$("#f_name").keyup(function(){
	 findContact();
	})
})

//ajax call
function makeRequest(params)
{
	  
	 $.ajax({
			 	async : true,
				type: 'POST',
				url: 'app/main.php',
				data: params,
				dataType: 'json',
				beforeSend:function()
				{
					
				     $(".preloader").html('loading contacts...');
				},
				success:function(data)
				{    
					 $(".preloader").html('');   				 
					 returnResult(data, params.request);    
				} 
           }); 	 
	  
}	  
 
function returnResult(data, req)
{  
     
	 if(!jQuery.isEmptyObject(data))
	 { 
		 if(req == 'getContacts' || req == 'findContact')
		 { 
			 for(var x=0; x<data["data"].length; x++)
			 {  
			  $('.contacts-list ul').append(
				  '<li>'+
				 '<table width="600" border="1">'+
				  '<tr>'+
					'<td width= "350"><strong>'+data["data"][x].name+'</strong></td>'+
					'<td>&nbsp;</td>'+
					'<td>&nbsp;</td>'+
				  '</tr>'+
				  '<tr>'+
					'<td><strong>Cell</strong> : '+
					data["data"][x].phone+
					'<strong> <br> Email</strong> : '
					+data["data"][x].email+'</td>'+
					'<td><a onclick="openEditForm(\''+data["data"][x].id+'\', \''+data["data"][x].name+'\', \''+data["data"][x].email+'\', \''+data["data"][x].phone+'\')" data-toggle = "modal" data-target = "#myModal">update</a></td>'+
					'<td><a onclick="deleteContact('+data["data"][x].id+')">delete</a></td>'+
				 ' </tr>'+
				'</table>'+
				'</li>'
			  ); 
			 }			 
		 }  
	 }
	 else
	{
		$('.contacts-list ul').html('<li>No contacts yet...</li>');
	}
}

function deleteContact(id){
  if(confirm('Are you sure you want ot delete this contact'))
  {
	  var params = {'request':'deleteContact', 'id':id};
	  var returned_data = makeRequest(params);	 
	  location.reload() 
  }
  console.log(returned_data);
}

function addContact()
{
  var params = {'request':'addContact', 'name':$("#c_name").val(), 'email':$("#email").val(), 'phone':$("#phone").val()};
  makeRequest(params);
  location.reload()    	
} 

function findContact()
{
	var params = {'request':'findContact', 'name':$("#f_name").val()};
	$('.contacts-list ul').html('');
	 makeRequest(params); 
}

function openEditForm(id, name, email, phone)
{
	$("#edit_id").val(id);
	$("#edit_name").val(name);
	$("#edit_email").val(email);
	$("#edit_phone").val(phone); 
}

function editContacts()
{ 	 	
	var params = {'request':'updateContact',  
	'id':$("#edit_id").val(), 'name':$("#edit_name").val(), 'email':$("#edit_email").val(), 'phone':$("#edit_phone").val()};
	makeRequest(params); 
	location.reload() 
}