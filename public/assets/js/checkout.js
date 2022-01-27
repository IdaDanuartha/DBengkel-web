const type1 = document.querySelector('.type.satu');
const type2 = document.querySelector('.type.dua');
const type3 = document.querySelector('.type.tiga');


function typeSelected(type_1, type_2, type_3) {
    type_1.addEventListener('click', function() {
        if(type_2.classList.contains('selected')) {
            type_2.classList.remove('selected')
            type_1.classList.add('selected')
        }
        
        if(type_3.classList.contains('selected')) {
            type_3.classList.remove('selected')
            type_1.classList.add('selected')
        }
    
    })

    type_2.addEventListener('click', function() {
        if(type_1.classList.contains('selected')) {
            type_1.classList.remove('selected')
            type_2.classList.add('selected')
        }
        
        if(type_3.classList.contains('selected')) {
            type_3.classList.remove('selected')
            type_2.classList.add('selected')
        }
    
    })

    type_3.addEventListener('click', function() {
        if(type_1.classList.contains('selected')) {
            type_1.classList.remove('selected')
            type_3.classList.add('selected')
        }
        
        if(type_2.classList.contains('selected')) {
            type_2.classList.remove('selected')
            type_3.classList.add('selected')
        }
    
    })
}

typeSelected(type1, type2, type3)


// Stepper 
const stepper1 = document.querySelector('.stepper-step.satu')
const stepper2 = document.querySelector('.stepper-step.dua')
const stepper3 = document.querySelector('.stepper-step.tiga')
const stepperContent1 = document.querySelector('.stepper-step.satu .stepper-content')
const stepperContent2 = document.querySelector('.stepper-step.dua .stepper-content')
const stepperContent3 = document.querySelector('.stepper-step.tiga .stepper-content')

stepper1.addEventListener('click', function() {
    if(this.classList.contains('stepper-active')) {
        stepperContent2.style.display = 'none'
        stepperContent3.style.display = 'none'
    }
}) 

stepper2.addEventListener('click', function() {
    if(this.classList.contains('stepper-active')) {
        stepperContent1.style.display = 'none'
        stepperContent3.style.display = 'none'
    }
})

stepper3.addEventListener('click', function() {
    if(this.classList.contains('stepper-active')) {
        stepperContent1.style.display = 'none'
        stepperContent2.style.display = 'none'
    }
})