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

}); // end document.ready


