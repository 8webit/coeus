import {NgModule} from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {RouterModule} from '@angular/router';

// Modules
import {AppRoutingModule} from './app-routing.module';
import {HeaderModule} from './header/header.module';
import {HomeModule} from './home/home.module';
import {PostsModule} from './posts/posts.module';
import {AuthorModule} from './author/author.module';
import {TemplateModule} from './template/template.module';
import {ErrorModule} from './error/error.module';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';

// Components
import {AppComponent} from './app.component';
import { FooterComponent } from './footer/footer.component';

// Services
import {CategoryService} from './shared/category.service';
import {SettingsService} from './shared/settings.service';
import { PostService } from './posts/shared/post.service';

// Interceptors
import { CachingInterceptor } from './shared/CachingInterceptor';
import { MetaService } from './shared/meta.service';

@NgModule({
  imports: [
    RouterModule,
    BrowserModule,
    HttpClientModule,
    HeaderModule,
    HomeModule,
    AuthorModule,
    ErrorModule,
    TemplateModule,
    PostsModule,
    AppRoutingModule,
  ],
  declarations: [
      AppComponent,
      FooterComponent
  ],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass: CachingInterceptor,
      multi: true,
    },
    PostService,
    CategoryService,
    SettingsService,
    MetaService
  ],
  bootstrap: [AppComponent]
})

export class AppModule {}
