document.addEventListener('DOMContentLoaded', () => {
    const todoList = document.getElementById('todoList');
    const form = document.getElementById('todoForm');
    const taskInput = document.getElementById('task');

    const renderTodo = (todo) => {
        const div = document.createElement('div');
        div.className = 'todo-item todo-enter';
        div.innerHTML = `
            <label>
                <input type="checkbox" ${todo.is_completed ? 'checked' : ''}
                    class="todo-checkbox"
                    data-id="${todo.id}">
                <span class="todo-text ${todo.is_completed ? 'completed' : ''}">
                    ${todo.task}
                </span>
            </label>
        `;
        return div;
    };

    // Load all Todos
    const loadTodos = async () => {
        try {
            const response = await axios.get('/todos');
            todoList.innerHTML = '';
            response.data.forEach(todo => {
                todoList.appendChild(renderTodo(todo));
            });
        } catch (error) {
            console.error('Error loading to-dos:', error);
            alert('Failed to load to-do list');
        }
    };

    // Save new todo
    const addTodo = async (task) => {
        try {
            const response = await axios.post('/todos', { task });
            const newTodo = renderTodo(response.data);
            todoList.append(newTodo);
            taskInput.value = '';
            taskInput.focus();
        } catch (error) {
            console.error('Error adding to-do:', error);
            alert('Failed to add to-do item');
        }
    };

    // Toggle todo status
    const updateTodoStatus = async (todoId, isCompleted) => {
        try {
            await axios.put(`/todos/${todoId}`, { is_completed: isCompleted });
            const todoText = document.querySelector(`[data-id="${todoId}"]`).nextElementSibling;
            todoText.classList.toggle('completed', isCompleted);
        } catch (error) {
            console.error('Error updating to-do:', error);
            alert('Failed to update to-do item');
        }
    };

    // Event Listeners
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const task = taskInput.value.trim();
        if (task) {
            await addTodo(task);
        }
    });

    todoList.addEventListener('change', (e) => {
        if (e.target.matches('.todo-checkbox')) {
            const todoId = e.target.dataset.id;
            const isCompleted = e.target.checked;
            updateTodoStatus(todoId, isCompleted);
        }
    });

    // Initial load
    loadTodos();
});