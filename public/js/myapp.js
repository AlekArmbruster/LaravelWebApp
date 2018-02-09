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


function Person(firstName, lastName, gender) {
  this.firstName = firstName;
  this.lastName = lastName;
  this.gender = gender;

  Person.prototype.greedings = function greedings () {
    console.log('Hello ' + this.firstName + ' ' + this.lastName);
  }
}

function Doctor(firstName, lastName, gender, speciality) {
  Person.call(this, firstName, lastName, gender);
  this.speciality = speciality;

  this.patients = [];

  this.addPatient = (patient) => {
    this.patients.push(patient);
  }

  Doctor.prototype.greedings = function () {
    console.log('Hello Dr. ' + this.firstName + ' ' + this.lastName + ' Speciality: ' + this.speciality);
  }

}

  function Patient(firstName, lastName, gender, medicRecordId) {
    Person.call(this, firstName, lastName, gender);
    this.medicRecordId = medicRecordId;
  }

Patient.prototype = Object.create(Person.prototype);
Patient.prototype.constructor = Patient;
Patient.parent = Person.prototype;

Doctor.prototype = Object.create(Person.prototype);
Doctor.prototype.constructor = Doctor;
Doctor.parent = Person.prototype;

const doctorMilan = new Doctor('Milan', 'Milanovic', 'M', 'hirurg');
const patientDragan = new Patient('Dragan', 'Dragic', 'M');

patientDragan.doktor = doctorMilan;
doctorMilan.addPatient(patientDragan);

doctorMilan.greedings();
patientDragan.greedings();

