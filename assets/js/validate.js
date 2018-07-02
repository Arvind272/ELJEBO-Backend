$(document).ready(function(){
 
 $('#changePassword').validate({
      ignore:null,
      ignore:'input[type="hidden"]',
      ignore:[],
  rules: {
    old_password: {
     
      required: true
                 
    },
    new_password: {
      required: true
    },
    confirm_passwprd: {
     
     required: true,
      equalTo:"#new_password"
    }
  },
  messages: {
        old_password: "Please enter your old password",
        new_password: "Please enter your new password",

        confirm_passwprd: {
            required: "Confirm password",
            equalTo: "Confirm password does not match"
        }
  },
 
 });


 $('#profileUpdate').validate({
      
  rules: {
    firstname: {
     
      required: true
                 
    },
    lastname: {
      required: true
    },
    mobile: {
     
     required: true,
     rangelength: [10, 10]
      
    },
    landline: {
     
     required: true,
     rangelength: [10, 10]
      
    }
    
  },
  messages: {
        firstname: "Please enter First Name",
        lastname: "Please enter last Name",
       
        mobile: {
            required: "Please enter valid mobile number",
            rangelength: "Please enter valid mobile number"
        },

        landline: {
            required: "Please enter valid landline number",
            rangelength: "Please enter valid landline number"
        }
  },
 
 });


  $("#add_CustomerPro").validate({
        rules: {
           firstname: {
              required: true,
            },
            lastname: {
              required: true,
            },
            username: {
             required: true,
            },
            email: {
              required: true,
              email:true,
              remote: {
            url: base_url+"admin/alreadyemail", 
            type: "post",
            data:{
            name:function(){
                return $('#email').val()
                            }
                }
                    }
            },
            password: {
              required: true,
            },
            gender: {
             required: true,
            },
            country: {
              required: true
            },
            state: {
             required: true,
            },
            city: {
              required: true,
            },
             phone: {
              required: true,
              number:true,
            },
            zip_code: {
              required: true,
              number:true,
            },
            question1: {
             required: true,
            },
            question2: {
              required: true,
            },
            question3: {
             required: true,
            },
            answer1: {
             required: true,
            },
            answer2: {
              required: true,
            },
            answer3: {
             required: true,
            },
            education: {
              required: true,
            
            },
            description: {
              required: true,
            },
            certification: {
              required: true,
            },
            address: {
              required: true,
            },
            address1: {
              required: true,
            },
            status: {
              required: true,
            }
          },
        messages: {
           
           firstname: {
              required: 'Please enter first name',
              },
            lastname: {
             required: 'Please enter last name',
            },
            username: {
             required: 'Please enter user name',
            },
            email: {
              required: 'Please enter email',
              email:'Please enter valid email',
              remote:'Email already exits',

            },
            password: {
              required: 'Please enter password',
            },
            gender: {
             required: 'Please select gender',
            },
            country: {
              required: ' Please select country',
            },
            state: {
             required: ' Please select state',
            },
            city: {
              required: 'Please select city',
            },
            zip_code: {
              required: 'Please enter zip code',
              number:'Please enter digit only',
            },
            phone: {
              required: 'Please enter mobile number',
              number:'Please enter digit only',
            },
            question1: {
             required: 'Please enter Question1',
            },
            question2: {
              required: 'Please enter Question2',
            },
            question3: {
             required: 'Please enter Question3',
            },
            answer1: {
             required: 'Please enter answer1',
            },
            answer2: {
             required: 'Please enter answer2',
            },
            answer3: {
             required: 'Please enter answer1',
            },
            education: {
              required: 'Please select education',
            },
            description: {
              required: 'Please select description',
            },
            certification: {
              required: 'Please select file',
            },
            address: {
              required: 'Please select description',
            },
            address1: {
              required: 'Please select file',
            },
            status: {
              required: 'Please select status',
            }
        },
    });
$("#add_servicePro").validate({
        rules: {
           firstname: {
              required: true,
            },
            lastname: {
              required: true,
            },
            username: {
             required: true,
            },
            email: {
              required: true,
              email:true,
              remote: {
            url: base_url+"admin/alreadyemail", 
            type: "post",
            data:{
            name:function(){
                return $('#email').val()
                            }
                }
                    }
            },
            password: {
              required: true,
            },
            gender: {
             required: true,
            },
            country: {
              required: true,
            },
            state: {
             required: true,
            },
            city: {
              required: true,
            },
             phone: {
              required: true,
              number:true,
            },
            zip_code: {
              required: true,
              number:true,
            },
            question1: {
             required: true,
            },
            question2: {
              required: true,
            },
            question3: {
             required: true,
            },
            answer1: {
             required: true,
            },
            answer2: {
              required: true,
            },
            answer3: {
             required: true,
            },
            education: {
              required: true,
            
            },
            description: {
              required: true,
            },
            certification: {
              required: true,
            },
            address: {
              required: true,
            },
            address1: {
              required: true,
            },
            status: {
              required: true,
            }
          },
        messages: {
           
           firstname: {
              required: 'Please enter first name',
              },
            lastname: {
             required: 'Please enter last name',
            },
            username: {
             required: 'Please enter user name',
            },
            email: {
              required: 'Please enter email',
              email:'Please enter valid email',
            },
            password: {
              required: 'Please enter password',
            },
            gender: {
             required: 'Please select gender',
            },
            country: {
              required: ' Please select country',
            },
            state: {
             required: ' Please select state',
            },
            city: {
              required: 'Please select city',
            },
            zip_code: {
              required: 'Please enter zip code',
              number:'Please enter digit only',
            },
            phone: {
              required: 'Please enter mobile number',
              number:'Please enter digit only',
            },
            question1: {
             required: 'Please enter Question1',
            },
            question2: {
              required: 'Please enter Question2',
            },
            question3: {
             required: 'Please enter Question3',
            },
            answer1: {
             required: 'Please enter answer1',
            },
            answer2: {
             required: 'Please enter answer2',
            },
            answer3: {
             required: 'Please enter answer1',
            },
            education: {
              required: 'Please select education',
            },
            description: {
              required: 'Please select description',
            },
            certification: {
              required: 'Please select file',
            },
            address: {
              required: 'Please select description',
            },
            address1: {
              required: 'Please select file',
            },
            status: {
              required: 'Please select status',
            }
        },
    });
 // edit 

  $("#edit_CustomerPro").validate({
        rules: {
           firstname: {
              required: true,
            },
            lastname: {
              required: true,
            },
            username: {
             required: true,
            },
            email: {
              required: true,
              email:true,
              
            },
            password: {
              required: true,
            },
            gender: {
             required: true,
            },
            country: {
              required: true,
            },
            state: {
             required: true,
            },
            city: {
              required: true,
            },
             phone: {
              required: true,
              number:true,
            },
            zip_code: {
              required: true,
              number:true,
            },
            question1: {
             required: true,
            },
            question2: {
              required: true,
            },
            question3: {
             required: true,
            },
            answer1: {
             required: true,
            },
            answer2: {
              required: true,
            },
            answer3: {
             required: true,
            },
            education: {
              required: true,
            
            },
            description: {
              required: true,
            },
            
            address: {
              required: true,
            },
            address1: {
              required: true,
            },
            status: {
              required: true,
            }
          },
        messages: {
           
           firstname: {
              required: 'Please enter first name',
              },
            lastname: {
             required: 'Please enter last name',
            },
            username: {
             required: 'Please enter user name',
            },
            email: {
              required: 'Please enter email',
              email:'Please enter valid email',
              
            },
            password: {
              required: 'Please enter password',
            },
            gender: {
             required: 'Please select gender',
            },
            country: {
              required: ' Please select country',
            },
            state: {
             required: ' Please select state',
            },
            city: {
              required: 'Please select city',
            },
            zip_code: {
              required: 'Please enter zip code',
              number:'Please enter digit only',
            },
            phone: {
              required: 'Please enter mobile number',
              number:'Please enter digit only',
            },
            question1: {
             required: 'Please enter Question1',
            },
            question2: {
              required: 'Please enter Question2',
            },
            question3: {
             required: 'Please enter Question3',
            },
            answer1: {
             required: 'Please enter answer1',
            },
            answer2: {
             required: 'Please enter answer2',
            },
            answer3: {
             required: 'Please enter answer1',
            },
            education: {
              required: 'Please select education',
            },
            description: {
              required: 'Please select description',
            },
            
            address: {
              required: 'Please select description',
            },
            address1: {
              required: 'Please select file',
            },
            status: {
              required: 'Please select status',
            }
        },
    });
$("#edit_servicePro").validate({
        rules: {
           firstname: {
              required: true,
            },
            lastname: {
              required: true,
            },
            username: {
             required: true,
            },
            email: {
              required: true,
              email:true,
              
            },
            password: {
              required: true,
            },
            gender: {
             required: true,
            },
            country: {
              required: true,
            },
            state: {
             required: true,
            },
            city: {
              required: true,
            },
             phone: {
              required: true,
              number:true,
            },
            zip_code: {
              required: true,
              number:true,
            },
            question1: {
             required: true,
            },
            question2: {
              required: true,
            },
            question3: {
             required: true,
            },
            answer1: {
             required: true,
            },
            answer2: {
              required: true,
            },
            answer3: {
             required: true,
            },
            education: {
              required: true,
            
            },
            description: {
              required: true,
            },
            
            address: {
              required: true,
            },
            address1: {
              required: true,
            },
            status: {
              required: true,
            }
          },
        messages: {
           
           firstname: {
              required: 'Please enter first name',
              },
            lastname: {
             required: 'Please enter last name',
            },
            username: {
             required: 'Please enter user name',
            },
            email: {
              required: 'Please enter email',
              email:'Please enter valid email',
              remote:'Email id already exits',
            },
            password: {
              required: 'Please enter password',
            },
            gender: {
             required: 'Please select gender',
            },
            country: {
              required: ' Please select country',
            },
            state: {
             required: ' Please select state',
            },
            city: {
              required: 'Please select city',
            },
            zip_code: {
              required: 'Please enter zip code',
              number:'Please enter digit only',
            },
            phone: {
              required: 'Please enter mobile number',
              number:'Please enter digit only',
            },
            question1: {
             required: 'Please enter Question1',
            },
            question2: {
              required: 'Please enter Question2',
            },
            question3: {
             required: 'Please enter Question3',
            },
            answer1: {
             required: 'Please enter answer1',
            },
            answer2: {
             required: 'Please enter answer2',
            },
            answer3: {
             required: 'Please enter answer1',
            },
            education: {
              required: 'Please select education',
            },
            description: {
              required: 'Please select description',
            },
           
            address: {
              required: 'Please select description',
            },
            address1: {
              required: 'Please select file',
            },
            status: {
              required: 'Please select status',
            }
        },
    });

}); // end document.ready


