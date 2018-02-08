//Vezba 10
var name = 'John'

var x = function() {
	var ime = name;
}

var prezime = name;

//Vezba 11

//Json objekat
var car = {type:"Fiat", model:"500", color:"white"};

//Niz json objekata
var cars = [
        { "name":"Ford", "models":[ "Fiesta", "Focus", "Mustang" ] },
        { "name":"BMW", "models":[ "320", "X3", "X5" ] },
        { "name":"Fiat", "models":[ "500", "Panda" ] }
    ]

class Person {

	constructor(firstName, lastName, gender) {
		this.firstName = firstName;
		this.lastName = lastName;
		this.gender = gender;
	}
	fullName() {
		return this.firstName + ' ' + this.lastName;
	}

	//Staticke metode se ne mogu pozivati nad instancama klase, vec samo unutar klase.
	static getFirstName() {
		return this.firstName;
	}
}

const person = new Person('John', 'Doe', 'male');
console.log(person.gender);
console.log(person.fullName());

//Nasledjivanje klase Person
function Teacher(first, last, age, gender, interests, subject) {
  Person.call(this, first, last, age, gender, interests);

  this.subject = subject;
}

