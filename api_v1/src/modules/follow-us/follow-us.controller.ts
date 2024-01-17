import { Controller, Get, Post, Body, Patch, Param, Delete } from '@nestjs/common';
import { FollowUsService } from './follow-us.service';
import { CreateFollowUsDto } from './dto/create-follow-us.dto';
import { UpdateFollowUsDto } from './dto/update-follow-us.dto';

@Controller('follow-us')
export class FollowUsController {
  constructor(private readonly followUsService: FollowUsService) {}

  @Post()
  create(@Body() createFollowUsDto: CreateFollowUsDto) {
    return this.followUsService.create(createFollowUsDto);
  }

  @Get()
  findAll() {
    return this.followUsService.findAll();
  }

  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.followUsService.findOne(+id);
  }

  @Patch(':id')
  update(@Param('id') id: string, @Body() updateFollowUsDto: UpdateFollowUsDto) {
    return this.followUsService.update(+id, updateFollowUsDto);
  }

  @Delete(':id')
  remove(@Param('id') id: string) {
    return this.followUsService.remove(+id);
  }
}
