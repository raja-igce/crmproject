(function($) {
  "use strict";

  // Chat user list
  if($('.chat-application .chat-user-list').length > 0){
    var chat_user_list = new PerfectScrollbar(".chat-user-list");
  }

  // Chat user profile
  if($('.chat-application .profile-sidebar-area .scroll-area').length > 0){
    var chat_user_list = new PerfectScrollbar(".profile-sidebar-area .scroll-area");
  }

  // Chat area
  if($('.chat-application .user-chats').length > 0){
    var chat_user = new PerfectScrollbar(".user-chats");
  }

  // User profile right area
  if($('.chat-application .user-profile-sidebar-area').length > 0){
    var user_profile = new PerfectScrollbar(".user-profile-sidebar-area");
  }

 

  // Update status by clickin on Radio
  /*
  $('.chat-application .user-status input:radio[name=userStatus]').on('change', function(){
    var $className = "avatar-status-"+this.value;
    $(".header-profile-sidebar .avatar span").removeClass();
    $(".sidebar-profile-toggle .avatar span").removeClass();
    $(".header-profile-sidebar .avatar span").addClass($className+" avatar-status-lg");
    $(".sidebar-profile-toggle .avatar span").addClass($className);
  }); */

  // On Profile close click
  $(".chat-application .close-icon").on('click',function(){
    $('.chat-profile-sidebar').removeClass('show');
    $('.user-profile-sidebar').removeClass('show');
    if(!$(".sidebar-content").hasClass("show")){
      $('.chat-overlay').removeClass('show');
    }
  });

  // On sidebar close click
  $(".chat-application .sidebar-close-icon").on('click',function(){
    $('.sidebar-content').removeClass('show');
    $('.chat-overlay').removeClass('show');
  });

  // On overlay click
  $(".chat-application .chat-overlay").on('click',function(){
      $('.app-content .sidebar-content').removeClass('show');
      $('.chat-application .chat-overlay').removeClass('show');
      $('.chat-profile-sidebar').removeClass('show');
      $('.user-profile-sidebar').removeClass('show');
  });

  // Add class active on click of Chat users list

 
   

  

  // Favorite star click
  $(".chat-application .favorite i").on("click", function(e) {
    $(this).parent('.favorite').toggleClass("warning");
    e.stopPropagation();
  });

  // Main menu toggle should hide app menu
  $('.chat-application .menu-toggle').on('click',function(e){
      $('.app-content .sidebar-left').removeClass('show');
      $('.chat-application .chat-overlay').removeClass('show');
  });

  // Chat sidebar toggle
  if ($(window).width() < 992) {
    $('.chat-application .sidebar-toggle').on('click',function(){
      $('.app-content .sidebar-content').addClass('show');
      $('.chat-application .chat-overlay').addClass('show');
    });
  }

  // For chat sidebar on small screen
  if ($(window).width() > 992) {
    if($('.chat-application .chat-overlay').hasClass('show')){
      $('.chat-application .chat-overlay').removeClass('show');
    }
  }

  // Scroll Chat area
  $(".user-chats").scrollTop($(".user-chats > .chats").height());

  // Filter
  $(".chat-application #chat-search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    if(value!=""){
      $(".chat-user-list .chat-users-list-wrapper li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    }
    else{
      // If filter box is empty
      $(".chat-user-list .chat-users-list-wrapper li").show();
    }
  });

})(jQuery);

$(window).on("resize", function() {
  // remove show classes from sidebar and overlay if size is > 992
  if ($(window).width() > 992) {
    if($('.chat-application .chat-overlay').hasClass('show')){
      $('.app-content .sidebar-left').removeClass('show');
      $('.chat-application .chat-overlay').removeClass('show');
    }
  }

  // Chat sidebar toggle
  if ($(window).width() < 992) {
    if($('.chat-application .chat-profile-sidebar').hasClass('show')){
      $('.chat-profile-sidebar').removeClass('show');
    }
    $('.chat-application .sidebar-toggle').on('click',function(){
      $('.app-content .sidebar-content').addClass('show');
      $('.chat-application .chat-overlay').addClass('show');
    });
  }
});


