<div>
    {{-- Stop trying to control. --}}
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-passwords">Change password</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    @foreach($user_details as $details)
                    <div class="tab-pane fade show active" id="account-general">
                        <div class="card-body media align-items-center">
                            <img src="{{asset('storage/user_photos/'.$details->profile_photo_path)}}" alt="" class="d-block ui-w-80">
                            <div class="media-body ml-4">
                            <form wire:submit.prevent="submitPhoto">
                                <label class="btn btn-outline-primary">
                                    Upload new photo
                                    <input type="file" class="account-settings-fileinput" wire:model="profile_photo_path">
                                </label>  &nbsp;
                                <button type="submit" class="btn btn-default md-btn-flat">Reset</button>
                                <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                <div wire:loading wire:target="profile_photo_path" style="color:green;"><strong>Uploading Image, Please Wait...</strong></div>
                                @error('profile_photo_path') <span class="text-danger">{{ $message }}</span> @enderror
                            </form>
                            </div>
                        </div>
                        <hr class="border-light m-0">
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control mb-1" wire:model="name">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email Or Phone Number</label>
                                <input type="text" class="form-control" wire:model="email">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Job Title</label>
                                <input type="text" class="form-control mb-1" wire:model="category">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control" value="Safeway  Junior School.">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                    </div>
                    </div>
                    @endforeach
                    <div class="tab-pane fade" id="account-change-passwords">
                        <div class="card-body pb-2">
                        <form wire:submit.prevent="updatePassword">
                            {{-- <div class="form-group">
                                <label class="form-label">Current password</label>
                                <input type="password" class="form-control" wire:model="current_password">
                                <div class="clearfix"></div>
                            </div> --}}
                            <div class="form-group">
                                <label class="form-label">New password</label>
                                <input type="password" class="form-control" wire:model="password">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Repeat new password</label>
                                <input type="password" class="form-control" wire:model="confirm_password">
                                <div class="clearfix"></div>
                            </div>
                            <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                            <div wire:loading wire:target="updatePassword" class="text-success">Wait We are Saving Your Data...</div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-info">
                        <div class="card-body pb-2">
                            <div class="form-group">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Birthday</label>
                                <input type="text" class="form-control" value="May 3, 1995">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="custom-select">
                                    <option>USA</option>
                                    <option selected>Canada</option>
                                    <option>UK</option>
                                    <option>Germany</option>
                                    <option>France</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Languages</label>
                                <select multiple class="account-settings-multiselect form-control w-100">
                                    <option selected>English</option>
                                    <option>German</option>
                                    <option>French</option>
                                </select>
                            </div>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Contacts</h6>
                            <div class="form-group">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" value="+0 (123) 456 7891">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" value="">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Interests</h6>
                            <div class="form-group">
                                <label class="form-label">Favorite music</label>
                                <input type="text" class="form-control account-settings-tagsinput" value="Rock,Alternative,Electro,Drum & Bass,Dance">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Favorite movies</label>
                                <input type="text" class="form-control account-settings-tagsinput" value="The Green Mile,Pulp Fiction,Back to the Future,WALL·E,Django Unchained,The Truman Show,Home Alone,Seven Pounds">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-social-links">
                        <div class="card-body pb-2">
                            <div class="form-group">
                                <label class="form-label">Twitter</label>
                                <input type="text" class="form-control" value="https://twitter.com/user">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Facebook</label>
                                <input type="text" class="form-control" value="https://www.facebook.com/user">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Google+</label>
                                <input type="text" class="form-control" value="">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" value="">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Instagram</label>
                                <input type="text" class="form-control" value="https://www.instagram.com/user">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-connections">
                        <div class="card-body">
                            <button type="button" class="btn btn-twitter">Connect to<strong>Twitter</strong></button>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <h5 class="mb-2">
                                <a href="javascript:void(0)" class="float-right text-muted text-tiny">
                                    <i class="ion ion-md-close"></i> Remove
                                </a>
                                <i class="ion ion-logo-google text-google"></i>You are connected to Google:
                            </h5> nmaxwell@mail.com
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <button type="button" class="btn btn-facebook">Connect to<strong>Facebook</strong></button>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <button type="button" class="btn btn-instagram">Connect to<strong>Instagram</strong></button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-notifications">
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Activity</h6>
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input" checked>
                                    <span class="switcher-indicator">
                                        <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Email me when someone comments on my article</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input" checked>
                                    <span class="switcher-indicator">
                                        <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Email me when someone answers on my forum thread</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input">
                                    <span class="switcher-indicator">
        <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Email me when someone follows me</span>
                                </label>
                            </div>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body pb-2">

                            <h6 class="mb-4">Application</h6>

                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input" checked>
                                    <span class="switcher-indicator">
        <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">News and announcements</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input">
                                    <span class="switcher-indicator">
        <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Weekly product updates</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input" checked>
                                    <span class="switcher-indicator">
        <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Weekly blog digest</span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="text-right mt-3">
        <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
        <button type="button" class="btn btn-default">Cancel</button>
    </div> --}}
</div>
