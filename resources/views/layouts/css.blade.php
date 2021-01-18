<style type="text/css" media="screen">
     @media (min-width: 768px){
      ::-webkit-scrollbar {
          height: 5px;
          width: 5px;
      }
      ::-webkit-scrollbar-track {
          background: none; 
      }
      ::-webkit-scrollbar-thumb {
          background: #999;
          height: 15px;
      }
      ::-webkit-scrollbar-thumb:hover {
          background: #ccc; 
      }
      ::-webkit-scrollbar-button:start {
        height: 10px;
      }
    }

    .container {
        margin-top: 20px;
    }

    body{
        background:#eee;
        zoom: 80%;   
    }

    .half-a-second{
        display: none
    }
    
    .email-app {
        display: flex;
        flex-direction: row;
        background: #fff;
        border: 1px solid #e1e6ef;
    }

    .email-app nav {
        flex: 0 0 200px;
        padding: 1rem;
        border-right: 1px solid #e1e6ef;
    }

    .email-app nav .btn-block {
        margin-bottom: 15px;
    }

    .email-app nav .nav {
        flex-direction: column;
    }

    .email-app nav .nav .nav-item {
        position: relative;
    }

    .email-app nav .nav .nav-item .nav-link,
    .email-app nav .nav .nav-item .navbar .dropdown-toggle,
    .navbar .email-app nav .nav .nav-item .dropdown-toggle {
        color: #151b1e;
        border-bottom: 1px solid #e1e6ef;
    }

    .email-app nav .nav .nav-item .nav-link i,
    .email-app nav .nav .nav-item .navbar .dropdown-toggle i,
    .navbar .email-app nav .nav .nav-item .dropdown-toggle i {
        width: 20px;
        margin: 0 10px 0 0;
        font-size: 14px;
        text-align: center;
    }

    .email-app nav .nav .nav-item .nav-link .badge,
    .email-app nav .nav .nav-item .navbar .dropdown-toggle .badge,
    .navbar .email-app nav .nav .nav-item .dropdown-toggle .badge {
        float: right;
        margin-top: 4px;
        margin-left: 10px;
    }

    .email-app main {
        min-width: 0;
        flex: 1;
        padding: 1rem;
    }

    .email-app .inbox .toolbar {
        padding-bottom: 1rem;
        border-bottom: 1px solid #e1e6ef;
    }

    .email-app .inbox .messages {
        padding: 0;
        list-style: none;
    }

    .email-app .inbox .message {
        position: relative;
        padding: 1rem 1rem 1rem 2rem;
        cursor: pointer;
        border-bottom: 1px solid #e1e6ef;
    }

    .email-app .inbox .message:hover {
        background: #f9f9fa;
    }

    .email-app .inbox .message .actions {
        position: absolute;
        left: 0;
        display: flex;
        flex-direction: column;
    }

    .email-app .inbox .message .actions .action {
        width: 2rem;
        margin-bottom: 0.5rem;
        color: #c0cadd;
        text-align: center;
    }

    .email-app .inbox .message a {
        color: #000;
    }

    .email-app .inbox .message a:hover {
        text-decoration: none;
    }

    .email-app .inbox .message.unread .header,
    .email-app .inbox .message.unread .title {
        font-weight: bold;
    }

    .email-app .inbox .message .header {
        display: flex;
        flex-direction: row;
        margin-bottom: 0.5rem;
    }

    .email-app .inbox .message .header .date {
        margin-left: auto;
    }

    .email-app .inbox .message .title {
        margin-bottom: 0.5rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .email-app .inbox .message .description {
        font-size: 12px;
    }

    .email-app .message .toolbar {
        padding-bottom: 1rem;
        border-bottom: 1px solid #e1e6ef;
    }

    .email-app .message .details .title {
        padding: 1rem 0;
        font-weight: bold;
    }

    .email-app .message .details .header {
        display: flex;
        padding: 1rem 0;
        margin: 1rem 0;
        border-top: 1px solid #e1e6ef;
        border-bottom: 1px solid #e1e6ef;
    }

    .email-app .message .details .header .avatar {
        width: 40px;
        height: 40px;
        margin-right: 1rem;
    }

    .email-app .message .details .header .from {
        font-size: 12px;
        color: #9faecb;
        align-self: center;
    }

    .email-app .message .details .header .from span {
        display: block;
        font-weight: bold;
    }

    .email-app .message .details .header .date {
        margin-left: auto;
    }

    .email-app .message .details .attachments {
        padding: 1rem 0;
        margin-bottom: 1rem;
        border-top: 3px solid #f9f9fa;
        border-bottom: 3px solid #f9f9fa;
    }

    .email-app .message .details .attachments .attachment {
        display: flex;
        margin: 0.5rem 0;
        font-size: 12px;
        align-self: center;
    }

    .email-app .message .details .attachments .attachment .badge {
        margin: 0 0.5rem;
        line-height: inherit;
    }

    .email-app .message .details .attachments .attachment .menu {
        margin-left: auto;
    }

    .email-app .message .details .attachments .attachment .menu a {
        padding: 0 0.5rem;
        font-size: 14px;
        color: #e1e6ef;
    }

    @media (max-width: 767px) {
        .email-app {
            flex-direction: column;
        }
        .email-app nav {
            flex: 0 0 100%;
        }
    }

    @media (max-width: 575px) {
        .email-app .message .header {
            flex-flow: row wrap;
        }
        .email-app .message .header .date {
            flex: 0 0 100%;
        }
    }


    table tr td{
        vertical-align: middle !important;
    }

    .dataTables_filter{
        margin-top: -30px
    }

    .table thead>tr{
        background: #0073AB !important;
        color: white !important
    }

    table.dataTable thead>tr{
        background: #0073AB !important;
        color: white !important
    }

    table.dataTable thead .sorting{
        background: none !important
    }

    table.dataTable thead .sorting_desc{
        background: none !important
    }

    table.dataTable thead .sorting_asc{
        background: none !important
    }

    .dataTable th{
        white-space: nowrap !important;
    }

    .dataTable td{
         white-space: nowrap !important;
    }

    .select2-container{
        width: 100% !important;
    }

    .modal-backdrop {
   background-color: transparent;
}
.required{
  color: red;
  font-size: 16px;
  font-weight: bold;
}
.navbar{
    background: #05376d !important;
}


.dashboard-section {
    background: #3d8fbf;
    padding: 15px 23px 5px;
    border: 1px solid #3d8fbf;
    color: #fff;
    overflow: hidden;
     margin-bottom: 30px;
}
.dashboard-icon {
    font-size: 30px;
    float: left;
    margin-right: 30px;
    margin-bottom: 30px;
    margin-top: 15px;
    border: 1px solid #fff;
    width: 60px;
    height: 60px;
    border-radius: 100%;
    text-align: center;
    padding-top: 13px;
}
.svg-inline--fa {
    display: inline-block;
    font-size: inherit;
    height: 1em;
    overflow: visible;
    vertical-align: -.125em;
}

.dashboard-section .details {
    padding-top: 15px;
}
.bg-info{
    background: #05376d !important;
}

.pull-right{
    float: right;
}
</style>