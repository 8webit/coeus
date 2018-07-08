import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';

import { PrimaryMenuComponent } from './primary-menu.component';


@NgModule({
    imports: [RouterModule, CommonModule ],
    declarations: [ PrimaryMenuComponent ],
    exports: [ PrimaryMenuComponent ]
})

export class PrimaryMenuModule { }
