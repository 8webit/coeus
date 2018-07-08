import { Component, OnInit } from '@angular/core';

import { CategoryModel } from '../../shared/category.model';
import { CategoryService } from '../../shared/category.service';

@Component({
  selector: 'app-sidebar-categories',
  templateUrl: './sidebar-categories.component.html',
  styleUrls: ['./sidebar-categories.component.css']
})
export class SidebarCategoriesComponent implements OnInit {
  categories: CategoryModel[] = [];

  constructor(private service: CategoryService ) { }

  getCategories() {
      this.service.getCategories()
                  .subscribe( categories => {
                      this.categories = categories;
                  });
  }

  ngOnInit() {
      this.getCategories();
  }

}
