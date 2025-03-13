@extends('backend.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Site Settings Section -->
            <div class="col-12">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Site Settings</h3>
                    </div>
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <!-- Site Title -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="site_title">Site Title</label>
                                        <input type="text" name="site_title" class="form-control"
                                            value="{{ $settings['site_title'] ?? '' }}" required>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control">{{ $settings['address'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Logos & Favicon -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" x-data="{
                                        left_logo_preview: '{{ isset($settings['left_logo']) && $settings['left_logo'] ? asset($settings['left_logo']) : '' }}'
                                    }">
                                        <label for="left_logo">Left Logo</label>
                                        <input type="file" name="left_logo" class="form-control"
                                            @change="let file = $event.target.files[0]; left_logo_preview = URL.createObjectURL(file)">
                                        <template x-if="left_logo_preview">
                                            <img :src="left_logo_preview" width="100" class="mt-2">
                                        </template>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" x-data="{
                                        right_logo_preview: '{{ isset($settings['right_logo']) && $settings['right_logo'] ? asset($settings['right_logo']) : '' }}'
                                    }">
                                        <label for="right_logo">Right Logo</label>
                                        <input type="file" name="right_logo" class="form-control"
                                            @change="let file = $event.target.files[0]; right_logo_preview = URL.createObjectURL(file)">
                                        <template x-if="right_logo_preview">
                                            <img :src="right_logo_preview" width="100" class="mt-2">
                                        </template>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" x-data="{ favicon_preview: '{{ isset($settings['favicon']) && $settings['favicon'] ? asset($settings['favicon']) : '' }}' }">
                                        <label for="favicon">Favicon</label>
                                        <input type="file" name="favicon" class="form-control"
                                            @change="let file = $event.target.files[0]; favicon_preview = URL.createObjectURL(file)">
                                        <template x-if="favicon_preview">
                                            <img :src="favicon_preview" width="50" class="mt-2">
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Links Section -->
                            <div class="mt-4">
                                <h4>Social Links</h4>
                                <div x-data="{ socialLinks: @json(isset($settings['social_links']) ? json_decode($settings['social_links'], true) : []) }">
                                    <template x-for="(link, index) in socialLinks" :key="index">
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <input type="text" x-model="link.name" class="form-control"
                                                    placeholder="Social Media Name">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="url" x-model="link.url" class="form-control"
                                                    placeholder="Social Media URL">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger"
                                                    @click="socialLinks.splice(index, 1)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </template>

                                    <button type="button" class="btn btn-success mt-2"
                                        @click="socialLinks.push({ name: '', url: '' })">
                                        <i class="fas fa-plus"></i> Add Social Link
                                    </button>

                                    <input type="hidden" name="social_links" x-model="JSON.stringify(socialLinks)">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary mt-4">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
