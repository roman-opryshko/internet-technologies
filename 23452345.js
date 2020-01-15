javascript:(function(){ 
    var i;
    var j;
    var element;
    var class_list = ['top-bar','bottom-notice', 'ps-relative', 'form-submit', 'show-votes', 'site-footer', 'js-add-answer-component']; 
    var correct_answer = document.getElementsByClassName('js-accepted-answer-indicator')[0]; 

    correct_answer.parentNode.parentNode.parentNode.parentNode.scrollIntoView(); 
    correct_answer.parentNode.parentNode.parentNode.parentNode.style.backgroundColor = 'rgba(136, 255, 71, 0.4)'; 

    var head = document.querySelector('head'); 
    var nodes = head.childNodes; 
    nodes.forEach(function(e, i) { if (e.tagName == 'SCRIPT'){ head.removeChild(e); } });

  
    for (i = 0; i < class_list.length; i++) 
    { 
        element = document.getElementsByClassName(class_list[i]);

            for (j = 0; j < element.length; j++)
            {
                element[j].parentNode.removeChild(element[j]);
            }   
    } 

})();

