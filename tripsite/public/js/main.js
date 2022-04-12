const incrementCount = document.getElementById("increment-count");
const decrementCount = document.getElementById("decrement-count");
const totalCount = document.getElementById("total-count");

console.log(price);

const totalSum = document.getElementById("total-sum");
// Select total count
// Variable to track count
var count = 1;
// Display initial count value

totalCount.innerHTML = count;
// Function to increment count

const handleIncrement = () => {
    count++;
    totalCount.innerHTML = count;
};
// Function to decrement count

const handleDecrement = () => {

    if(count == 1){
        count=1 ;
    }
    else{
        count--;
    }
    totalCount.innerHTML = count;

};

// Add click event to buttons

incrementCount.addEventListener("click", handleIncrement);
decrementCount.addEventListener("click", handleDecrement);

const inputs = document.querySelectorAll(".input");


function addcl(){
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl(){
    let parent = this.parentNode.parentNode;
    if(this.value == ""){
        parent.classList.remove("focus");
    }
}


inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});
function myFunction() {
    location.replace("")
}
