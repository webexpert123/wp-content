<div class="dashboard-main">
                    <div class="row">
                        <div class="col page-title">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="m-0">My Account</h2>
                                <div class="d-flex align-items-center pd-3">
                                    <ul class="breadcrumbs">
                                        <li><a href="#">Home</a></li>
                                        <li>My Account</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- top cols of dashboard -->
                    <div class="profile-page">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title mb-4">
                                            <h5 class="">Account Information</h5>
                                        </div>
                                        <div class="my-account-tabs">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="payment-tab" data-toggle="tab"
                                                        data-target="#payment" type="button" role="tab"
                                                        aria-controls="payment" aria-selected="true">Payment Info</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="subscription-tab" data-toggle="tab"
                                                        data-target="#subscription" type="button" role="tab"
                                                        aria-controls="subscription" aria-selected="false">My
                                                        Subscriptions</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="auth-tab" data-toggle="tab"
                                                        data-target="#auth" type="button" role="tab"
                                                        aria-controls="auth" aria-selected="false">Update Password</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="order-tab" data-toggle="tab"
                                                        data-target="#order" type="button" role="tab"
                                                        aria-controls="order" aria-selected="false">Order
                                                        History</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="payment" role="tabpanel"
                                                    aria-labelledby="payment-tab">
                                                    <div class="tabs-inner row p-4">
                                                        <div class="col-lg-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="card-title mb-4">
                                                                        <h5 class="">Add Country/Region</h5>
                                                                    </div>
                                                                    <div class="row mb-3 profile-overview">
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="formGroupExampleInput">Select
                                                                                    Country</label>
                                                                                <select class="form-control">
                                                                                    <option>United States of America
                                                                                    </option>
                                                                                    <option>Afghanistan</option>
                                                                                    <option>Åland Islands</option>
                                                                                    <option>Albania</option>
                                                                                    <option>Andorra</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="page-save-action d-flex align-items-center ms-2">
                                                                                <button type="button">Save</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="card-title mb-4">
                                                                        <h5 class="">Payment Method</h5>
                                                                        <span>Add New Card</span>
                                                                    </div>
                                                                    <div class="row mb-3 profile-overview">
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="formGroupExampleInput">Card
                                                                                    Number</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="formGroupExampleInput"
                                                                                    value="1234 1234 1234">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="formGroupExampleInput">Expiry
                                                                                    Date</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="formGroupExampleInput"
                                                                                    value="Andrio Rechard">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="formGroupExampleInput">CVV
                                                                                    Number</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="formGroupExampleInput"
                                                                                    value="Andrio Rechard">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div
                                                                                class="page-save-action d-flex align-items-center ms-2">
                                                                                <button type="button">Add Card</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="subscription" role="tabpanel"
                                                    aria-labelledby="subscription-tab">
                                                    <div class="tabs-inner p-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="card-title mb-4">
                                                                    <h5 class="">My Subscription Plan</h5>
                                                                </div>
                                                                <div class="subscription-plans">
                                                                    <div class="subscription-list px-4 py-4 mb-3">
                                                                        <div class="subscription-start d-flex align-items-center">
                                                                            <div class="subscription-icon col-auto mr-4">
                                                                                <i class="bx bx-credit-card-front"></i>
                                                                            </div>
                                                                            <div class="subscription-info">
                                                                                <h3 class="mb-0">Basic Tier Subscription</h3>
                                                                                <span>Coach - Starter (1 - 5 Athletes)</span>
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="badge badge-danger mr-2">
                                                                                        Expired
                                                                                    </div>
                                                                                    <span>Expired on October 28, 2024.</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="subscription-action ms-auto">
                                                                                <div class="page-save-action">
                                                                                    <button type="button">Manage Subscription</button>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="subscription-plans">
                                                                <div class="subscription-list px-4 py-4 mb-3">
                                                                    <div class="subscription-start d-flex align-items-center">
                                                                        <div class="subscription-icon col-auto mr-4">
                                                                            <i class="bx bx-credit-card-front"></i>
                                                                        </div>
                                                                        <div class="subscription-info">
                                                                            <h3 class="mb-0">Pro Tier Subscription</h3>
                                                                            <span>Coach - Starter (1 - 5 Athletes)</span>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="badge badge-danger mr-2">
                                                                                    Expired
                                                                                </div>
                                                                                <span>Expired on October 28, 2024.</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="subscription-action ms-auto">
                                                                            <div class="page-save-action">
                                                                                <button type="button">Manage Subscription</button>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="contact" role="tabpanel"
                                                    aria-labelledby="contact-tab">...</div>
                                                </div>
                                                <div class="tab-pane fade" id="auth" role="tabpanel"
                                                    aria-labelledby="auth-tab">
                                                    <div class="tabs-inner row p-4">
                                                        <div class="col-md-8">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="card-title mb-4">
                                                                        <h5 class="">Update Password</h5>
                                                                    </div>
                                                                    <div class="row mb-3 profile-overview">
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="formGroupExampleInput">
                                                                                    New Password</label>
                                                                                <input type="password" class="form-control" id="formGroupExampleInput"
                                                                                    value="*************">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-2">
                                                                            <div class="form-group">
                                                                                <label for="formGroupExampleInput">
                                                                                    Re-Enter Password</label>
                                                                                <input type="password" class="form-control" id="formGroupExampleInput"
                                                                                    value="*************">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div
                                                                                class="page-save-action d-flex align-items-center ms-2">
                                                                                <button type="button" class="update_btn">Update Password</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                                                <div class="tabs-inner p-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="card-title mb-4">
                                                                <h5 class="">Order History</h5>
                                                            </div>
                                                            <div class="order-history">
                                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Plan</th>
                                                                            <th>Start date</th>
                                                                            <th>End date</th>
                                                                            <th>Plan Pricing</th>
                                                                            <th>Download</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#45228165</td>
                                                                            <td>Basic Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>#25368759</td>
                                                                            <td>Pro Tier</td>
                                                                            <td>2024-08-25</td>
                                                                            <td>2024-09-25</td>
                                                                            <td>$300</td>
                                                                            <td><a href="#" class="btn btn-success btn-rounded">Download Invoice</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Plan</th>
                                                                            <th>Start date</th>
                                                                            <th>End date</th>
                                                                            <th>Plan Pricing</th>
                                                                            <th>Download</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>