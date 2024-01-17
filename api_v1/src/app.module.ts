import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { SlideModule } from './modules/slide/slide.module';
import { CategoryModule } from './modules/category/category.module';
import { ProductModule } from './modules/product/product.module';
import { ColorModule } from './modules/color/color.module';
import { SizeModule } from './modules/size/size.module';
import { HeaderModule } from './modules/header/header.module';
import { FollowUsModule } from './modules/follow-us/follow-us.module';
import { FooterModule } from './modules/footer/footer.module';
import { UserModule } from './modules/user/user.module';
import { ContactModule } from './modules/contact/contact.module';
import { RoleModule } from './modules/role/role.module';
import { OrderModule } from './modules/order/order.module';
import { PaymentMethodModule } from './modules/payment-method/payment-method.module';
import { ReviewModule } from './modules/review/review.module';
import { TypeOrmModule } from '@nestjs/typeorm';
import { dbdatasource } from './config/data.source';
import { ContactInfoModule } from './modules/contact-info/contact-info.module';

@Module({
  imports: [
    TypeOrmModule.forRoot(dbdatasource),
    SlideModule,
    CategoryModule,
    ProductModule,
    ColorModule,
    SizeModule,
    HeaderModule,
    FollowUsModule,
    FooterModule,
    UserModule,
    ContactModule,
    RoleModule,
    OrderModule,
    PaymentMethodModule,
    ReviewModule,
    ContactInfoModule,
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
