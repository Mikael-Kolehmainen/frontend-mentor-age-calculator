const calculateAgeBtn = document.getElementById("calculate-age");
const dayInput = document.getElementById("day-input");
const monthInput = document.getElementById("month-input");
const yearInput = document.getElementById("year-input");
const dayResult = document.getElementById("day");
const monthResult = document.getElementById("month");
const yearResult = document.getElementById("year");

const calculateAge = () => {
  resetElements();
  const day = Number(dayInput.children[1].value);
  const month = Number(monthInput.children[1].value);
  const year = Number(yearInput.children[1].value);
  let invalidInput = false;

  invalidInput = checkForEmptyInputs(day, month, year);

  if (day && (day < 0 || day > 31)) {
    markInputAsError(dayInput, "Must be a valid day");
    invalidInput = true;
  }

  if (month && (month < 1 || month > 12)) {
    markInputAsError(monthInput, "Must be a valid month");
    invalidInput = true;
  }

  if (year && (year > new Date().getFullYear())) {
    markInputAsError(yearInput, "Must be in the past");
    invalidInput = true;
  }

  if (invalidInput) {
    return;
  }

  if (!validateInputtedDate(year, month, day)) {
    markInputAsError(dayInput, "Must be a valid date");
    markInputAsError(monthInput, "");
    markInputAsError(yearInput, "");
    return;
  }

  const today = new Date();
  const currentDay = today.getDate();
  const currentMonth = today.getMonth() + 1;
  const currentYear = today.getFullYear();

  let ageDay = currentDay > day ? currentDay - day : 31 - day + currentDay;
  let ageMonth = currentMonth > month ? currentMonth - month : 11 - month + currentMonth;
  if (day == currentDay) {
    ageDay = 0;
    ageMonth++;
  }

  if (day <= currentDay && month == currentMonth) {
    ageMonth = 0;
  }

  let ageYear = currentYear - year - 1;
  if (month < currentMonth || month == currentMonth && day <= currentDay) {
    ageYear++;
  }


  dayResult.innerText = ageDay;
  monthResult.innerText = ageMonth;
  yearResult.innerText = ageYear;
};

const resetElements = () => {
  resetInput(dayInput);
  resetInput(monthInput);
  resetInput(yearInput);
};

const resetInput = (input) => {
  input.children[0].classList.remove("error");
  input.children[1].classList.remove("error");
  input.children[2].innerText = "";
};

const checkForEmptyInputs = (day, month, year) => {
  if (!day) {
    markInputAsError(dayInput, "This field is required");
  }

  if (!month) {
    markInputAsError(monthInput, "This field is required");
  }

  if (!year) {
    markInputAsError(yearInput, "This field is required");
  }

  return !day || !month || !year;
};

const markInputAsError = (input, errorLabel) => {
  input.children[0].classList.add("error");
  input.children[1].classList.add("error");
  input.children[2].innerText = errorLabel;
};

const validateInputtedDate = (year, month, day) => {
  const inputtedDate = new Date(year, month-1, day+1);
  return !isNaN(inputtedDate) && inputtedDate.toISOString().slice(0, 10) === `${year}-${addLeadingZero(month)}-${addLeadingZero(day)}`;
};

const addLeadingZero = (num) => {
  return num < 10 ? "0" + num : num;
};

calculateAgeBtn.addEventListener("click", calculateAge);
