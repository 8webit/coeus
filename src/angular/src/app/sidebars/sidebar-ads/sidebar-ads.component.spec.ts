import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SidebarAdsComponent } from './sidebar-ads.component';

describe('SidebarAdsComponent', () => {
  let component: SidebarAdsComponent;
  let fixture: ComponentFixture<SidebarAdsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SidebarAdsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SidebarAdsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
