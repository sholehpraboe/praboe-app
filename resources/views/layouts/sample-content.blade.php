<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Fixed Top</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Navbars</a>
                  </li>
                  <li class="breadcrumb-item active">Fixed Top
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-4 col-12">
            <div class="btn-group float-md-right">
              <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Action</button>
              <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
              </div>
            </div>
          </div>
        </div>
    <div class="content-body"><!-- Description -->
<section id="description" class="card">
    <div class="card-header">
        <div class="card-title">
            <h4 class="card-title">Description</h4>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="card-text">
                <p>The navbar fixed top option has a fixed navbar at the top side. This option can be use with any type of navbar, color & options.</p>
            </div>
            <div class="alert bg-success alert-icon-left mb-2" role="alert">
              <span class="alert-icon"><i class="fa fa-pencil-square"></i></span>
              <strong>Experience it!</strong>
              <p>This page contain navbar fix top option example, check the top navbar.</p>
            </div>
        </div>
    </div>
</section>
<!--/ Description -->
<!-- CSS Classes -->
<section id="css-classes" class="card">
    <div class="card-header">
        <h4 class="card-title">CSS Classes</h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="card-text">
                <p>This table contains all classes related to the fixed navbar layout. This is a custom layout classes for fixed navbar layout page requirements.</p>
                <p>All these options can be set via following classes:</p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Classes</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><code>.fixed-top</code></th>
                                <td>To set navbar fixed you need to add <code>.fixed-top</code> class in navbar <code>&lt;nav&gt;</code> tag. Refer HTML markup line no 7.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ CSS Classes -->
<!-- HTML Markup -->
<section id="html-markup" class="card">
    <div class="card-header">
        <h4 class="card-title">HTML Markup</h4>
        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="card-text">
                <p>This section contains HTML Markup to create fixed navbar layout. This markup define where to add css classes to make navbar fixed.</p>
                <ul>
                    <li><span class="text-bold-600">Line no 7:</span> Contain the <code>.fixed-top</code> class for adjusting navbar fixed on top.</li>
                </ul>
                <p>Robust has a ready to use starter kit, you can use this layout directly by using the starter kit pages from the <code>robust-admin/starter-kit</code> folder.</p>
                <pre data-line="7" class="language-markup">
        <code class="language-markup">
            &lt;!DOCTYPE html&gt;
              &lt;html lang="en"&gt;
                &lt;head&gt;&lt;/head&gt;
                &lt;body data-menu="vertical-menu" class="vertical-layout vertical-menu 2-column menu-expanded"&gt;

                  &lt;!-- fixed-top--&gt;
                  &lt;nav  class="header-navbar navbar-expand-sm navbar navbar-with-menu fixed-top navbar-dark navbar-shadow navbar-border"&gt;
                      ...
                  &lt;/nav&gt;

                  &lt;!-- BEGIN Navigation--&gt;
                  &lt;div class="main-menu menu-dark menu-shadow"&gt;
                      ...
                  &lt;/div&gt;
                  &lt;!-- END Navigation--&gt;

                  &lt;!-- BEGIN Content--&gt;
                  &lt;div class="content app-content"&gt;
                      &lt;div class="content-wrapper"&gt;
                          &lt;!-- content header--&gt;
                          &lt;div class="content-header row"&gt;
                              ...
                          &lt;/div&gt;
                          &lt;!-- content header--&gt;

                          &lt;!-- content right--&gt;
                          &lt;div class="content-right"&gt;
                              ...
                          &lt;/div&gt;
                          &lt;!-- content right--&gt;

                      &lt;/div&gt;
                  &lt;/div&gt;
                  &lt;!-- END Content--&gt;

                  &lt;!-- START FOOTER DARK--&gt;
                  &lt;footer class="footer footer-dark"&gt;
                      ...
                  &lt;/footer&gt;
                  &lt;!-- START FOOTER DARK--&gt;

                &lt;/body&gt;
              &lt;/html&gt;
        </code>
        </pre>
            </div>
        </div>
    </div>
</section>
<!--/ HTML Markup -->

        </div>
      </div>