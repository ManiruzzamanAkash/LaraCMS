<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Comments</h4>
            </div>
            <div class="comment-widgets scrollable" style="height:430px;">
                <!-- Comment Row -->
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2">
                        <img src="{{ asset('public/assets/backend/images/user.jpg') }}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">James Anderson</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="text-muted float-right">April 14, 2016</span>
                            <span class="label label-rounded label-primary">Pending</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                        <img src="{{ asset('public/assets/backend/images/user.jpg') }}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text active w-100">
                        <h6 class="font-medium">Michael Jorden</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer ">
                            <span class="text-muted float-right">April 14, 2016</span>
                            <span class="label label-success label-rounded">Approved</span>
                            <span class="action-icons active">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="icon-close"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart text-danger"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                        <img src="{{ asset('public/assets/backend/images/user.jpg') }}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Johnathan Doeting</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="text-muted float-right">April 14, 2016</span>
                            <span class="label label-rounded label-danger">Rejected</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Comment Row -->
                <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2">
                        <img src="{{ asset('public/assets/backend/images/user.jpg') }}" alt="user" width="50" class="rounded-circle">
                    </div>
                    <div class="comment-text w-100">
                        <h6 class="font-medium">Steve Jobs</h6>
                        <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                        <div class="comment-footer">
                            <span class="text-muted float-right">April 14, 2016</span>
                            <span class="label label-rounded label-primary">Pending</span>
                            <span class="action-icons">
                                <a href="javascript:void(0)">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-check"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="ti-heart"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center p-b-15">
                    <div>
                        <h4 class="card-title m-b-0">To Do List</h4>
                    </div>
                    <div class="ml-auto">
                        <div class="dl">
                            <select class="custom-select border-0 text-muted">
                                <option value="0" selected="">August 2018</option>
                                <option value="1">May 2018</option>
                                <option value="2">March 2018</option>
                                <option value="3">June 2018</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="todo-widget scrollable" style="height:422px;">
                    <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label todo-label" for="customCheck">
                                    <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="badge badge-pill badge-success float-right">Project</span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label todo-label" for="customCheck1">
                                    <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</span><span class="badge badge-pill badge-danger float-right">Project</span>
                                </label>
                            </div>

                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label todo-label" for="customCheck2">
                                    <span class="todo-desc">Ipsum is simply dummy text of the printing</span> <span class="badge badge-pill badge-info float-right">Project</span>
                                </label>
                            </div>

                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                <label class="custom-control-label todo-label" for="customCheck3">
                                    <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="badge badge-pill badge-info float-right">Project</span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                <label class="custom-control-label todo-label" for="customCheck4">
                                    <span class="todo-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</span> <span class="badge badge-pill badge-purple float-right">Project</span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                <label class="custom-control-label todo-label" for="customCheck5">
                                    <span class="todo-desc">Ipsum is simply dummy text of the printing</span> <span class="badge badge-pill badge-success float-right">Project</span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item todo-item" data-role="task">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                <label class="custom-control-label todo-label" for="customCheck6">
                                    <span class="todo-desc">Simply dummy text of the printing and typesetting</span> <span class="badge badge-pill badge-primary float-right">Project</span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Recent comment and chats -->
<!-- ============================================================== -->