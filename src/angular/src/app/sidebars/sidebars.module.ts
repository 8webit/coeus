import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { SearchBoxModule } from '../search-box/search-box.module';

import {SidebarsComponent} from './sidebars.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { SidebarCategoriesComponent } from './sidebar-categories/sidebar-categories.component';
import { SidebarRecentPostsComponent } from './sidebar-recent-posts/sidebar-recent-posts.component';
import { SidebarAuthorComponent } from './sidebar-author/sidebar-author.component';
import { SidebarAdsComponent } from './sidebar-ads/sidebar-ads.component';
import { SidebarShortcodeComponent } from './sidebar-shortcode/sidebar-shortcode.component';
import { SidebarSearchComponent } from './sidebar-search/sidebar-search.component';

@NgModule({
  imports: [
    CommonModule,
    RouterModule,
    SearchBoxModule
  ],
  declarations: [
    SidebarsComponent,
    SidebarComponent,
    SidebarCategoriesComponent,
    SidebarRecentPostsComponent,
    SidebarAuthorComponent,
    SidebarAdsComponent,
    SidebarShortcodeComponent,
    SidebarSearchComponent
  ],
  exports: [
    SidebarsComponent
  ]
})
export class SidebarsModule { }
