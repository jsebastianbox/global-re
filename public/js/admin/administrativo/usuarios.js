let users;

const usersTableBody = document.getElementById('usersTableBody')

/* CREATE USER */
//resolver conflicto opacity
const addBtnContainer = document.getElementById('addBtnContainer')
function openCreateUser() {
    $('#usersTable').fadeToggle(100)
    setTimeout(() => {
        $('#addUserContainer').fadeToggle(100)
    }, 100)
    addBtnContainer.innerHTML = ''
    const btn = document.createElement('button')
    btn.className = 'btn btn-danger danger m-3'
    btn.innerText = 'Tabla de usuarios'
    addBtnContainer.appendChild(btn)
    btn.onclick = closeCreateUser
}
function closeCreateUser() {
    $('#addUserContainer').fadeToggle(100)
    setTimeout(() => {
        $('#usersTable').fadeToggle(100)
    }, 100)
    addBtnContainer.innerHTML = ''
    const btn = document.createElement('button')
    btn.className = 'btn-success btn m-3'
    btn.innerText = 'Agregar usuario'
    addBtnContainer.appendChild(btn)
    btn.onclick = openCreateUser
}

function createUser(event) {
    event.preventDefault()
    let form = document.getElementById('addUserForm')
    let formData = new FormData(form)
    let obj = {}
    formData.forEach((val, key) => obj[key] = val)
    console.log(obj);
    const btnPost = document.getElementById(`btnPost`)
    btnPost.innerHTML =
    `
    <div style="width:16px;height:16px" class="spinner-border" role="status">
    </div>
    `
    const testURL = window.location.origin + '/api/apiusers'
    const productionURL = window.location.origin + '/api/apiusers'

    fetch( testURL, {
        method: 'POST',
        body: JSON.stringify(obj), // data can be `string` or {object}!
        headers:{
            "Content-Type": "application/json"
        }
    })
    .then(res => res.json())
    .then(response => {
        getUsersFetch()
        listUsers()
        btnPost.innerHTML = 'Editado <i class="fa-solid fa-check"></i>'
        btnPost.style.backgroundColor = 'green'
        console.log('Success:', response)
    })
}

/* READ USERS */

async function getUsersFetch() {
    let data = await fetch(window.location.origin + '/api/apiusers')
    let response = await data.json()
    users = response
    console.log(response);
    return response
}
getUsersFetch()

function listUsers() {

    setTimeout(() => {
        if (users.length > 0) {
            usersTableBody.innerHTML = ''
            users.forEach(user => {
                const tr = document.createElement('tr')
                usersTableBody.appendChild(tr)
                tr.innerHTML = `
                    <td class="hidden-xs">${user.id}</td>
                    <td>${user.name} ${user.surname}</td>
                    <td>${user.email}</td>
                    <td>${user.sex}</td>
                    <td>${user.completed}</td>
                    <td>
                        <button onclick="openEditModal(${user.id})" class="btn btn-primary">
                            <svg xmlns="texthttp://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </button>
                        <button id="btnDelete${user.id}" onclick="deleteUser(${user.id})" class="danger btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </button>
                    </td>
                `

                const div2 = document.createElement('div')
                div2.className = 'modalEditContainer'
                div2.id = `editForm${user.id}`
                document.body.appendChild(div2)
                div2.innerHTML = `
                <div class="modalEdit card" style="margin:1rem">
                        <div class="card-header text-center">
                            <h3>Edit user ${user.id}</h3>
                        </div>
                        <div class="card-body">
                            <form id="editForm2${user.id}" class="useructsForm2 animate__animated animate__flipInY">
                                <div class="two-sides">
                                    <div class="left-side">
                                            <label class="labelForm">
                                                Nombre:
                                                <input name="name" value="${user.name}" type="text">
                                            </label>

                                            <label class="labelForm">
                                                Apellido:
                                                <input name="surname" value="${user.surname}" type="text">
                                            </label>

                                            <label class="labelForm">
                                                Email:
                                                <input name="email" value="${user.email}" type="text">
                                            </label>

                                    </div>
                                    <div class="right-side">
                                        <label class="labelForm" for="country2">
                                            Country:
                                            <input name="country" value="${user.country}" type="text">
                                        </label>

                                        <label class="labelForm" for="role">Role:
                                            <select class="form-select form-select-sm">
                                                <option value="admin">Admin</option>
                                                <option value="tech">Tenico</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="card-footer">
                            <div class="button_group">
                                <button onclick="closeEditModal(${user.id})" class="btn btn-danger danger">Cerrar</button>
                                <button id="btnPut${user.id}" onclick="editForm(event, ${user.id})" class="button_group_button">Guardar</button>
                            </div>
                        </div>
                    </div>
                `
            })
        }
    },1000)
}
listUsers()

/* UPDATE USER */
function openEditModal(formId) {
    document.getElementById(`editForm${formId}`).classList.toggle('showEditModal')
}
function closeEditModal(formId) {
    document.getElementById(`editForm${formId}`).classList.toggle('showEditModal')
}

function editForm(event, id) {
    event.preventDefault()
    let form = document.getElementById(`editForm2${id}`)
    let formData = new FormData(form)
    let obj = {}
    formData.forEach((val, key) => obj[key] = val)
    console.log(obj);
    const btnPut = document.getElementById(`btnPut${id}`)
    btnPut.innerHTML =
    `
    <div style="width:16px;height:16px" class="spinner-border" role="status">
    </div>
    `
    const testURL = window.location.origin + '/api/apiusers'
    const productionURL = window.location.origin + '/api/apiusers'
    const userFound = users.find(user => user.id == id)


    fetch( testURL + '/' + userFound.id, {
        method: 'PUT',
        body: JSON.stringify(obj), // data can be `string` or {object}!
        headers:{
            'Content-Type': 'application/json'
        }

    })
    .then(res => {
        console.log( res.headers.get("content-type") );
        res.json()
    })
    .then(response => {
        getUsersFetch()
        listUsers()
        btnPut.innerHTML = 'Editado <i class="fa-solid fa-check"></i>'
        btnPut.style.backgroundColor = 'green'
        console.log('Success:', response)
    })
}
/* DELETE USER */

function deleteUser(id) {
    const userFound = users.find(user => user.id == id)
    if (userFound) {
        console.log(userFound);
        console.log(id);
        const btnDelete = document.getElementById(`btnDelete${id}`)
        btnDelete.innerHTML =
        `
            <div style="width:16px;height:16px" class="spinner-border" role="status">
            </div>
        `
        const testURL = window.location.origin + '/api/apiusers'
        const productionURL = 'https://www.global.com/api/products'
        fetch( testURL + '/' + userFound.id, {
            method: 'DELETE',
        })
        .then(response => {
            getUsersFetch()
            listUsers()
            console.log('Success:', response)
        })
        .catch(error => console.error('Error:', error))
    }
}
