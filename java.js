
const taskForm = document.getElementById('task-form');
const taskInput = document.getElementById('task-input');
const taskList = document.getElementById('task-list');


let tasks = [];


if (localStorage.getItem('tasks')) {
  tasks = JSON.parse(localStorage.getItem('tasks'));
  renderTaskList();
}


taskForm.addEventListener('submit', function(event) {
  event.preventDefault(); 

  // Obtener el valor del campo de texto
  const taskText = taskInput.value.trim();

  // Validar que no esté vacío
  if (taskText !== '') {
    // Agregar la tarea al arreglo de tareas
    tasks.push(taskText);

    // Actualizar el almacenamiento local con las tareas
    localStorage.setItem('tasks', JSON.stringify(tasks));

    // Actualizar la lista de tareas
    renderTaskList();

    // Limpiar el campo de texto
    taskInput.value = '';
  }
});

// Función para mostrar la lista de tareas
function renderTaskList() {
  // Limpiar la lista actual
  taskList.innerHTML = '';

  // Recorrer las tareas y agregar elementos de lista
  tasks.forEach(function(taskText) {
 
    const newTask = document.createElement('li');
    const taskTextSpan = document.createElement('span');
    taskTextSpan.textContent = taskText;
    newTask.appendChild(taskTextSpan);

    // Agregar la tarea a la lista
    taskList.appendChild(newTask);
  });
}







