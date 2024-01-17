import { Controller, Get, Post, Body, Patch, Param, Delete } from '@nestjs/common';
import { FooterService } from './footer.service';
import { CreateFooterDto } from './dto/create-footer.dto';
import { UpdateFooterDto } from './dto/update-footer.dto';

@Controller('footer')
export class FooterController {
  constructor(private readonly footerService: FooterService) {}

  @Post()
  create(@Body() createFooterDto: CreateFooterDto) {
    return this.footerService.create(createFooterDto);
  }

  @Get()
  findAll() {
    return this.footerService.findAll();
  }

  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.footerService.findOne(+id);
  }

  @Patch(':id')
  update(@Param('id') id: string, @Body() updateFooterDto: UpdateFooterDto) {
    return this.footerService.update(+id, updateFooterDto);
  }

  @Delete(':id')
  remove(@Param('id') id: string) {
    return this.footerService.remove(+id);
  }
}
