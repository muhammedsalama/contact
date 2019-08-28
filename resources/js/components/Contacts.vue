<template>
    <div>
        <form action="#" @submit.prevent="edit ? updateContact(contact.id) : createContact()">
            <div class="form-group">
                <label for="contact">Name</label>
                <input v-model="contact.name" id="contact" type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input v-model="contact.email" id="email" type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input v-model="contact.phone" id="phone" type="number" name="phone" class="form-control">
            </div>

            <div class="form-group">
                <button v-show="!edit" type="submit" class="btn btn-success">New Contact</button>
                <button v-show="edit" type="submit" class="btn btn-success">Edit Contact</button>
            </div>

        </form>

        <h1>Contacts</h1>

        <ul class="list-group">
            <li v-for="contact in list" class="list-group-item">
                <strong> {{contact.name}} </strong> - {{contact.email}} - {{contact.phone}}
                <div class="float-right">
                    <button @click="showContact(contact.id)" class="btn btn-info btn-sm">Edit</button>
                    <button @click="deleteContact(contact.id)" class="btn btn-danger btn-sm">Delete</button>
                </div>

            </li>
        </ul>

    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                edit: false,
                list: [],
                contact: {
                    id: '',
                    name: '',
                    email: '',
                    phone: ''
                }
            }
        },
        mounted: function () {
            console.log('Contacts Component loaded..');
            this.fetchContactList();
        },

        methods: {
            fetchContactList: function () {
                console.log('Fetching contacts ..');
                axios.get('api/contacts')
                    .then((response) => {
                        console.log(response.data)
                        this.list = response.data
                    }).catch((error) => {
                    console.log(error)
                });
            },

            createContact: function () {
                console.log('Creating Contact..');

                axios.post('api/contact/create', Object.assign({}, this.contact))
                    .then(() => {
                        this.contact.name = '';
                        this.contact.email = '';
                        this.contact.phone = '';
                        this.edit = false;
                        this.fetchContactList();
                    }).catch((error) => {
                    console.log(error)
                });

            },

            showContact: function (id) {
                axios.get('api/contacts/' + id).then((response) => {
                    this.contact.id = response.data.id;
                    this.contact.name = response.data.name;
                    this.contact.email = response.data.email;
                    this.contact.phone = response.data.phone;
                });
                this.edit = true;
            },

            deleteContact: function (id) {
                axios.delete('api/contact/delete/' + id)
                    .then((response) => {
                        this.fetchContactList()
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },

            updateContact: function (id) {
                console.log('Updating Contact ' + id + '..');
                axios.patch('api/contact/update/' + id, Object.assign({}, this.contact))
                    .then(() => {
                        this.contact.name = '';
                        this.contact.email = '';
                        this.contact.phone = '';
                        this.edit = false;
                        this.fetchContactList();
                    }).catch((error) => {
                    console.log(error)
                });
            }
        }
    }
</script>

