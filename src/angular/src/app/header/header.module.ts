import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { PrimaryMenuModule } from './menu/primary-menu.module';
import { SearchBoxModule } from '../search-box/search-box.module';

import { HeaderComponent } from './header.component';
import { BrandComponent } from './brand/brand.component';

@NgModule({
    imports: [
        CommonModule,
        RouterModule,
        PrimaryMenuModule,
        SearchBoxModule
           ],
    exports: [ HeaderComponent ],
    declarations: [ HeaderComponent, BrandComponent ]
})

export class HeaderModule { }
