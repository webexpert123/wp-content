// sidebar menu toggle function
let hamburIcon = document.getElementById('hamburIcon');
let asideMenu = document.getElementById("asideMenu");
let menuClicked = false;

hamburIcon.addEventListener("click", () => {
    menuClicked = !menuClicked;
    asideMenu.style.display = menuClicked ? "flex" : "none";
});
document.addEventListener("click", (event) => {
    if (!hamburIcon.contains(event.target) && !asideMenu.contains(event.target)) {
        asideMenu.style.display = "none";
        menuClicked = false;
    }
});
/**
   * Apply .scrolled class to the body as the page is scrolled down
   */
function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('.header-main');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

/**
   * step wizard
   */
  $(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
              allPrevBtn = $('.prevBtn');
  
    allWells.hide();
  
    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);
  
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    
    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
            prevStepWizard.removeAttr('disabled').trigger('click');
    });
  
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;
  
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
            nextStepWizard.removeAttr('disabled').trigger('click');
    });
  
    $('div.setup-panel div a.btn-primary').trigger('click');
  });
  
// increase and decrease button

  function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }



  // file upload js

  
//  tour js

 // Instance the tour
 var tour = new Tour({
  steps: [
  {
    element: "#profile-image",
    placement: "auto",
    backdropPadding: 5,    
    content: "Click on a category above to open the latest blog posts on that subject.",
    template: "<div class='popover tour hca-tooltip--left-nav'><div class='arrow'></div><div class='row'><div class='col-sm-12'><div data-role='next' class='close'>X</div></div></div><div class='row'><div class='col-sm-2'><i class='fa fa-hand-pointer-o fa-3x' aria-hidden='true'></i></div><div class='col-sm-10'><p class='popover-content'></p><a id='hca-left-nav--tooltip-ok' href='#' data-role='next' class='btn hca-tooltip--okay-btn'>Okay</a></div></div></div>"
  },
  {
    element: "#search",
    placement: "auto", 
    backdropPadding: 5,   
    content: "Can't find the post you're looking for?  Use our search engine to find it.",
    template: "<div class='popover tour hca-tooltip--left-nav'><div class='arrow'></div><div class='row'><div class='col-sm-12'><div data-role='next' class='close'>X</div></div></div><div class='row'><div class='col-sm-2'><i class='fa fa-search fa-3x' aria-hidden='true'></i></div><div class='col-sm-10'><p class='popover-content'></p><a id='hca-left-nav--tooltip-ok' href='#' data-role='next' class='btn hca-tooltip--okay-btn'>Okay</a></div></div></div>"
  },
  {
    element: "#comment",
    placement: "top",
    backdropPadding: 20,    
    content: "Have something to say? Leave a new comment by click the textarea below.",
    template: "<div class='popover tour hca-tooltip--left-nav'><div class='arrow'></div><div class='row'><div class='col-sm-12'><div data-role='next' class='close'>X</div></div></div><div class='row'><div class='col-sm-2'><i class='fa fa-paper-plane fa-3x' aria-hidden='true'></i></div><div class='col-sm-10'><p class='popover-content'></p><a id='hca-left-nav--tooltip-ok' href='#' data-role='next' class='btn hca-tooltip--okay-btn'>Okay</a></div></div></div>"
  }],
    animation: true,
    backdrop: true,  
    storage: false,
    smartPlacement: true,
    
});



