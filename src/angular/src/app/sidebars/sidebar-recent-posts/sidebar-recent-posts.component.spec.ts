import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SidebarRecentPostsComponent } from './sidebar-recent-posts.component';

describe('SidebarRecentPostsComponent', () => {
  let component: SidebarRecentPostsComponent;
  let fixture: ComponentFixture<SidebarRecentPostsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SidebarRecentPostsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SidebarRecentPostsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should be created', () => {
    expect(component).toBeTruthy();
  });
});
