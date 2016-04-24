$(function() {

  $('.sidebar-collapse').sideNav({
    edge: 'left',    
  });
  
  $('.chat-collapse').sideNav({
    menuWidth: 240,
    edge: 'right',
  });

  $('.chat-close-collapse').click(function() {
    $('.chat-collapse').sideNav('hide');
  });
  
  $('.chat-collapsible').collapsible({
    accordion: false
  });

});