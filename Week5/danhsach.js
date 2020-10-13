function click_row(self){
	if (self.checked == true) {
		self.parentNode.parentNode.classList.add("checked");
		document.querySelector("div.group-op").classList.remove("nodisplay");
		console.log(self)
	}
	else{
		self.parentNode.parentNode.classList.remove("checked");
	}
};
// function checkAll(self){
// 	if (self.checked == true) {
// 		self.parentNode.parentNode.classList.add("checked");
// 		console.log(1);
// 		let check = document.getElementsByName("check");
// 		console.log(check);
// 		for (i = 0; i < check.length; i++){
// 			console.log(check[i]);
// 			check[i].checked = self.checked;
// 			if(check[i].checked){
// 				check[i].parentNode.parentNode.classList.add("checked");
// 			}
// 		}
// 	}
// 	if(self.checked == false){				
// 		self.parentNode.parentNode.classList.remove("checked");
// 		let check = document.getElementsByName("check");
// 		console.log(1);
// 		for(i = 0; i < check.length; i++){
// 			console.log(check[i]);
// 			check[i].parentNode.parentNode.remove("checked");
// 		}

	// }
document.getElementById("checkAll").onchange = function(){
	let check = document.getElementsByName("check");
	for(i = 0; i < check.length; i++){
		check[i].checked = this.checked;
		if (check[i].checked == true) {
			check[i].parentNode.parentNode.classList.add("checked");
		}else{
			check[i].parentNode.parentNode.classList.remove("checked");
		}
	}
	if (this.checked == true) {
		document.querySelector("div.group-op").classList.remove("nodisplay");
	}else{
		document.querySelector("div.group-op").classList.add("nodisplay");	
	}
};

document.querySelector(".group-op-delete").onchange = function() {
	let c = document.getElementsByName("check");	
	console.log(c); 		
	for (let i = c.length-1; i >= 0; i--)
		if (c[i].checked) {
			c[i].parentNode.parentNode.parentNode.removeChild(c[i].parentNode.parentNode);
		}
};

